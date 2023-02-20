<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'has_email_verified' => $this->has_email_verified ?? false,
            'email_verified_at' => $this->email_verified_at,
            'phone' => $this->phone,
            'has_phone_verified' => $this->has_phone_verified ?? false,
            'phone_verified_at' => $this->phone_verified_at,
            'provider_type' => $this->provider_type,
            'provider_id' => $this->provider_id,
            'is_admin' => $this->is_admin ?? false,
            'is_vip' => $this->is_vip ?? false,
            'is_customer' => $this->is_customer ?? false,
            'otp_mail' => $this->otp_mail,
            'otp_phone' => $this->otp_phone,
            'has_agreed' => $this->has_agreed ?? false,
            'etat' => $this->etat,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
//            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'notifications_count' => $this->notifications_count,
            'read_notifications_count' => $this->read_notifications_count,
            'tokens_count' => $this->tokens_count,
            'unread_notifications_count' => $this->unread_notifications_count,
        ];
    }

}
