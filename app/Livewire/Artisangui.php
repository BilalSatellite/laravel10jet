<?php

namespace App\Livewire;

use Livewire\Component;
use Filament\Actions\Action;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use SensioLabs\AnsiConverter\AnsiToHtmlConverter;
use SensioLabs\AnsiConverter\Theme\SolarizedTheme;
use Filament\Actions\Concerns\InteractsWithActions;
use Symfony\Component\Console\Output\BufferedOutput;

class Artisangui extends Component implements HasForms, HasActions
{
    use InteractsWithActions;
    use InteractsWithForms;
    // public $output;
    public $massage;
    public function mount(): void
    {
        abort_unless(auth()->user()->hasRole('Admin'), 403);
    }
    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->hasRole('Admin');
    }
    private function bufferedOutputt()
    {
        return new BufferedOutput(BufferedOutput::VERBOSITY_NORMAL, true);
    }
    // Ansi To Html Converter
    public function cmdinfo($output)
    {
        $theme = new SolarizedTheme();
        $converter = new AnsiToHtmlConverter($theme);
        $content = $output->fetch();
        $this->massage = $converter->convert($content);
        // dd($this->massage);
        $this->dispatch('open-modal', id: 'modalFormVisible');
    }
    public function cacheClear()
    {
        $output = $this->bufferedOutputt();
        Artisan::call('optimize:clear', [], $output);
        $this->cmdinfo($output);
    }
    public function configCache()
    {
        Artisan::call('config:cache');
        dd('config:cache Success.');
    }
    public function routeCache()
    {
        Artisan::call('route:cache');
        dd('route:cache Success.');
    }
    public function render()
    {
        return view('livewire.artisangui');
    }
}
