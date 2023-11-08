<div>
				<x-filament::section>
								<x-slot name="heading">
												Artisan Command
								</x-slot>
								<x-slot name="description">
												This is Artisan Command for optimize Laravel Project.
								</x-slot>
								<x-filament::button wire:click="configCache">
												{{ __('config:cache') }}
								</x-filament::button>
								<x-filament::button wire:click="routeCache">
												{{ __('route:cache') }}
								</x-filament::button>
								<x-filament::button wire:click="cacheClear">
												{{ __('optimize:clear') }}
								</x-filament::button>
				</x-filament::section>
				{{-- <x-filament::modal wire:model="modalFormVisible">
								<x-slot name="heading">
												Modal heading
								</x-slot>
								Modal content
				</x-filament::modal> --}}
				<x-filament::modal width="5xl" id="modalFormVisible">
								<x-slot name="heading">
												Artisan Command OutPut.
								</x-slot>
								{{-- {{ $output }} --}}
								<div style="background-color: black; overflow: auto; padding: 10px 15px; font-family: monospace;">
												{!! $massage !!}
								</div>
				</x-filament::modal>
</div>
