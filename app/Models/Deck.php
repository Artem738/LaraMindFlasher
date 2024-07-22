<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'is_public',
    ];

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с моделью Flashcard
    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }
}
