<?php

namespace App\Observers;

use App\Models\FarmData;
use App\Traits\RandomNumber;

class FarmObserver
{
    use RandomNumber;

    /**
     * Handle the FarmData "creating" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function creating(FarmData $farmData)
    {
        $farmData->register_number = $this->generateUniqueId('kambing');
        $farmData->birthday = date('d-m-Y', strtotime($farmData->birthday));
    }

    /**
     * Handle the FarmData "created" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function created(FarmData $farmData)
    {
        //
    }

    /**
     * Handle the FarmData "updated" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function updated(FarmData $farmData)
    {
        //
    }

    /**
     * Handle the FarmData "deleted" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function deleted(FarmData $farmData)
    {
        //
    }

    /**
     * Handle the FarmData "restored" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function restored(FarmData $farmData)
    {
        //
    }

    /**
     * Handle the FarmData "force deleted" event.
     *
     * @param  \App\Models\FarmData  $farmData
     * @return void
     */
    public function forceDeleted(FarmData $farmData)
    {
        //
    }
}
