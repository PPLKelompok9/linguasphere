<?php

namespace Filament\Tables\Actions;

use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Support\Facades\FilamentIcon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class DetachAction extends Action
{
    use CanCustomizeProcess;

    public static function getDefaultName(): ?string
    {
        return 'detach';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-actions::detach.single.label'));

        $this->modalHeading(fn (): string => __('filament-actions::detach.single.modal.heading', ['label' => $this->getRecordTitle()]));

        $this->modalSubmitActionLabel(__('filament-actions::detach.single.modal.actions.detach.label'));

        $this->successNotificationTitle(__('filament-actions::detach.single.notifications.detached.title'));

        $this->color('danger');

        $this->icon(FilamentIcon::resolve('actions::detach-action') ?? 'heroicon-m-x-mark');

        $this->requiresConfirmation();

        $this->modalIcon(FilamentIcon::resolve('actions::detach-action.modal') ?? 'heroicon-o-x-mark');

        $this->action(function (): void {
            $this->process(function (Model $record, Table $table): void {
                /** @var BelongsToMany $relationship */
                $relationship = $table->getRelationship();

                if ($table->allowsDuplicates()) {
<<<<<<< HEAD
                    $record->{$relationship->getPivotAccessor()}->delete();
=======
                    $record->getRelationValue($relationship->getPivotAccessor())->delete();
>>>>>>> 890ebdd96f7d6873ba198cc859e87d61062ce611
                } else {
                    $relationship->detach($record);
                }
            });

            $this->success();
        });
    }
}
