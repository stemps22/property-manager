<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex flex-col items-center justify-center py-8 text-center">
            <div class="p-4 mb-4 rounded-full bg-primary-50">
                <x-filament::icon
                    icon="heroicon-o-credit-card"
                    class="w-10 h-10 text-primary-600"
                />
            </div>

            <h2 class="text-2xl font-bold tracking-tight text-gray-950">
                Action Required: Subscription Needed
            </h2>

            <p class="max-w-md mt-3 text-gray-600">
                Your account is currently inactive. To start managing properties and access all features, please set up your subscription plan.
            </p>

            <div class="flex gap-4 mt-8">
                <x-filament::button
                    tag="a"
                    href="{{ route('billing.portal') }}"
                    size="lg"
                >
                    View Subscription Plans
                </x-filament::button>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
