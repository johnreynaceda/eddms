<?php

namespace App\Livewire\ProgramChair;

use App\Events\SendNotification;
use App\Models\Attachment;
use App\Models\Category;
use App\Models\Document;
use App\Models\Faculty;
use App\Models\Notification;
use App\Models\Post;
use App\Models\ProgramChair;
use App\Models\User;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDocument extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public $can_view;
    public $document_code, $subject, $description, $category, $program_chair, $faculty, $date_of_letter, $deadline, $file = [], $attachment_description;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('Add Details')->icon('heroicon-m-user')->description('Ensure all fields are filled out accurately before submission.')->aside()->schema([
                TextInput::make('document_code')->label('Document Code')->disabled()->required()->columnSpan(2),
                Textarea::make('subject')->required(),
                // Textarea::make('description')->required(),
                Select::make('category')->label('Classification')->options(Category::all()->mapWithKeys( function($record){
                    return [$record->id => $record->classification->name. ' - ' . $record->name];
                })),
                Select::make('can_view')
                ->label('Can View')
                ->options([
                    'Program Chair' => 'Program Chair',
                    'Faculty' => 'Faculty',
                ])
                ->live(),

            Select::make('program_chair')
                ->label('Program Chair')
                ->options(ProgramChair::where('user_id', '!=', auth()->user()->id)->get()->mapWithKeys(function($record){
                    return [$record->id => $record->lastname. ', '. $record->firstname]; // Adjust according to your program chair model's structure
                }))
                ->visible(fn ($get) => $get('can_view') == 'Program Chair'),

            Select::make('faculty')
                ->label('Faculty')
                ->options(Faculty::where('user_id', '!=', auth()->user()->id)->get()->mapWithKeys(function($record){
                    return [$record->id => $record->lastname. ', '. $record->firstname]; // Adjust according to your program chair model's structure
                }))
                ->visible(fn ($get) => $get('can_view') == 'Faculty'),
                ViewField::make('rating')
            ->view('filament.forms.blank')->columnSpan(2),
            DatePicker::make('date_of_letter')->required(),
            DatePicker::make('deadline')->required()->visible(auth()->user()->user_type == 'program_chair'),

               ])->columns(2),
               Section::make('Add Attachments')->aside()->icon('heroicon-m-paper-clip')->schema([
                Textarea::make('attachment_description')->label('Description')->required(),
                FileUpload::make('file')->required()
               ])->columns(2)
            ]);
    }

    public function saveRecord(){
        sleep(1);

        $docs = Document::create([
            'user_id' => auth()->user()->id,  // Assuming user_id is defined in your User model
            'document_code' => $this->document_code,
            'subject' => $this->subject,
            'category_id' => $this->category,
            'can_view' => $this->can_view,
            'program_chair_id' => $this->program_chair?? null,
            'faculty_id' => $this->faculty?? null,
            'date_of_letter' => Carbon::parse($this->date_of_letter),
            'deadline' => Carbon::parse($this->deadline),
        ]);

        foreach ($this->file as $key => $value) {
           Attachment::create([
            'document_id' => $docs->id,
            'description' => $this->attachment_description,
            'file_path' => $value->store('Attachment', 'public'),
           ]);
        }
        $user_id = $this->program_chair == null ? Faculty::find($this->faculty)->first()->user_id : ProgramChair::find($this->program_chair)->user_id;
        SendNotification::dispatch($user_id);
        Notification::create([
            'receiver_id' => $user_id,
            'sender_id' => auth()->user()->id,
            'details' => auth()->user()->name. ' has sent you a document. ',
        ]);
        sweetalert()->success('Data is successfully saved!');
       if (auth()->user()->user_type == 'program_chair') {
        return redirect()->route('program_chair.dashboard');
       }else{
        return redirect()->route('staff.dashboard');
       }
    }

    public function generateUniqueCode($count) {
        $this->document_code = sprintf("DC_%06d", $count + 1);
    }


    public function render()
    {
        $count = Document::count();
        $this->generateUniqueCode($count);
        return view('livewire.program-chair.create-document');
    }
}
