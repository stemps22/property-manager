<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($this->getPlans() as $key => $plan)
            <div class="p-6 bg-white border rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">{{ $plan['name'] }}</h3>
                <p class="mt-4 text-3xl font-bold text-gray-900 dark:text-white">
                    ${{ $plan['price'] }}<span class="text-sm font-normal text-gray-500">/mo</span>
                </p>

                <ul class="mt-6 space-y-3">
                    @foreach($plan['features'] as $feature)
                        <li class="flex items-start text-sm text-gray-600 dark:text-gray-400">
                            {{-- We wrap the icon in a div with flex-shrink-0 to prevent scaling issues --}}
                            <div class="flex-shrink-0 mt-0.5">
                                <x-filament::icon icon="heroicon-o-check-circle" class="w-5 h-5 text-primary-600" />
                            </div>
                            <span class="ml-3">{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>

                <x-filament::button wire:click="subscribe('{{ $key }}')" class="w-full mt-8">
                    Select {{ $plan['name'] }}
                </x-filament::button>
            </div>
        @endforeach
    </div>
</x-filament-panels::page>