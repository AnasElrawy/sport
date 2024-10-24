<?php

namespace App\Http\Repository\WhatsAppNotification;

class WhatsAppNotificationRepository
{
  public function whatsAppNotification($cust_phone)
  {
    $tempelate = '{"integrated_number": "12792385610","content_type": "template","payload":
    {"messaging_product": "whatsapp","type": "template","template": {"name": "test","language":
    {"code": "en_US","policy": "deterministic"},"namespace": null,"to_and_components": [{"to":
    ["201112474982","201550048098"],"components": {"body_1": {"type": "text","value": "abdo"},"body_2":
    {"type": "text","value": "123123"},"body_3": {"type": "text","value": "Sunday"}}}]}}}';
  }
} 
