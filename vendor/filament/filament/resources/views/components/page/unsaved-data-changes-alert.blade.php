@php
    use Filament\Support\Facades\FilamentView;
@endphp

@if ($this->hasUnsavedDataChangesAlert())
    @if (FilamentView::hasSpaMode())
        @script
            <script>
<<<<<<< HEAD
                let formSubmitted = false

                document.addEventListener(
                    'submit',
                    () => (formSubmitted = true),
                )

                shouldPreventNavigation = () => {
                    if (formSubmitted) {
=======
                shouldPreventNavigation = () => {
                    if ($wire?.__instance?.effects?.redirect) {
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
                        return
                    }

                    return (
                        window.jsMd5(
                            JSON.stringify($wire.data).replace(/\\/g, ''),
<<<<<<< HEAD
                        ) !== $wire.savedDataHash ||
                        $wire?.__instance?.effects?.redirect
=======
                        ) !== $wire.savedDataHash
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
                    )
                }

                const showUnsavedChangesAlert = () => {
                    return confirm(@js(__('filament-panels::unsaved-changes-alert.body')))
                }

                document.addEventListener('livewire:navigate', (event) => {
                    if (typeof @this !== 'undefined') {
                        if (!shouldPreventNavigation()) {
                            return
                        }

                        if (showUnsavedChangesAlert()) {
                            return
                        }

                        event.preventDefault()
                    }
                })

                window.addEventListener('beforeunload', (event) => {
                    if (!shouldPreventNavigation()) {
                        return
                    }

                    event.preventDefault()
                    event.returnValue = true
                })
            </script>
        @endscript
    @else
        @script
            <script>
                window.addEventListener('beforeunload', (event) => {
                    if (
                        window.jsMd5(
                            JSON.stringify($wire.data).replace(/\\/g, ''),
                        ) === $wire.savedDataHash ||
                        $wire?.__instance?.effects?.redirect
                    ) {
                        return
                    }

                    event.preventDefault()
                    event.returnValue = true
                })
            </script>
        @endscript
    @endif
@endif
