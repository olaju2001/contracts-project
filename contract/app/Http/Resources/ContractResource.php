<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'is_mosque'               => $this->is_mosque,
            'quran_date'              => $this->quran_date,
            'quran_address'           => $this->quran_address,
            'deferred_dowry'          => $this->deferred_dowry,
            'prompt_dower'            => $this->prompt_dower,
            'terms'                   => $this->terms,
            'status'                  => $this->status,
            'user_id'                 => $this->user_id,
            'action_by'               => $this->action_by,
            'updated_by'              => $this->updated_by,
            'person'                  => $this->persons,
            'husbandFront'                   => $this->getFirstMediaUrl('husbandFront'),
            'husbandBack'                   => $this->getFirstMediaUrl('husbandBack'),
            'wifeFront'                   => $this->getFirstMediaUrl('wifeFront'),
            'wifeBack'                   => $this->getFirstMediaUrl('wifeBack'),
            'firstWitnessFront'                 => $this->getFirstMediaUrl('firstWitnessFront'),
            'firstWitnessBack'                 => $this->getFirstMediaUrl('firstWitnessBack'),
            'secondWitnessFront'               => $this->getFirstMediaUrl('secondWitnessFront'),
            'secondWitnessBack'               => $this->getFirstMediaUrl('secondWitnessBack'),
            'agentFront'                     => $this->getFirstMediaUrl('agentFront'),
            'agentBack'                     => $this->getFirstMediaUrl('agentBack'),
            'divorceCertificate'                     => $this->getFirstMediaUrl('divorceCertificate'),
            'husbandDeathCertificate'                     => $this->getFirstMediaUrl('husbandDeathCertificate'),


        ];
    }
}

