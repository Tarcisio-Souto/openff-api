<?php

namespace App\Enums;
 
enum TypeOfStatusEnum:string {

    case draft = 'draft';
    case trash = 'trash';
    case published = 'published';

}