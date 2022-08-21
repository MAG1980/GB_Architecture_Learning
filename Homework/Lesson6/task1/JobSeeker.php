<?php

class JobSeeker implements IObserver
{
    protected string $mame;
    protected string $mail;
    protected int $workExperience;

    /**
     * @param string $mame
     * @param string $mail
     * @param int $workExperience
     */
    public function __construct(string $mame, string $mail, int $workExperience)
    {
        $this->mame = $mame;
        $this->mail = $mail;
        $this->workExperience = $workExperience;
    }

//TODO убрать параметры из метода
    public function update(string $text)
    {
    }
}