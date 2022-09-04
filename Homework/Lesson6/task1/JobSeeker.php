<?php

class JobSeeker implements IObserver
{
    public string $name;
    public string $mail;
    public int $workExperience;

    /**
     * @param  int  $id
     * @param  string  $name
     * @param  string  $mail
     * @param  int  $workExperience
     */
    public function __construct(int $id, string $name, string $mail, int $workExperience)
    {
        $this->id = $id;
        $this->name = $name;
        $this->mail = $mail;
        $this->workExperience = $workExperience;
    }

    public function update(string $text)
    {
        echo "{$this->name}, {$text} ";
        mail($this->mail, 'Уведомление с сайта HandHunter.gb', $text);
    }
}