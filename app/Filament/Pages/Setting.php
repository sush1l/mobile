<?php

namespace App\Filament\Pages;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Exceptions\Halt;

class Setting extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.setting';

    public function mount(): void
    {
        $setting = \App\Models\Setting::first(); // Use the full namespace if needed
        if ($setting) {
            // Fill the form with attributes if a setting is found
            $this->form->fill($setting->attributesToArray());
        }
    }




    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('office_header')
                    ->label('Office Name')
                    ->required(),
                TextInput::make('office_header_en')
                    ->label('Office Name En')
                    ->required(),
                TextInput::make('phone_no')
                    ->label('Contact No')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->required(),
                FileUpload::make('logo')
                    ->label('Office Logo')
                    ->required(),
                FileUpload::make('cover_image')
                    ->label('Cover Image')
                    ->required(),
            ])
            ->statePath('data');
    }





    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('filament-panels::resources/pages/edit-record.form.actions.save.label'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            $setting = \App\Models\Setting::first(); // Use the first() method on the query builder
            if (!empty($setting)) {
                $setting->update($data);
            } else {
                \App\Models\Setting::create($data);
            }
        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('filament-panels::resources/pages/edit-record.notifications.saved.title'))
            ->send();
    }


}
