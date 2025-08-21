<?php

// SUMMARY
// A readonly property can be initialized once from within the class.
// Use the readonly keyword in a typed property to make the property readonly.

class UserProfile
{
    public function __construct(private string $name, private string $phone)
    {
    }

    public function changeNumber(string $phone)
    {
        $this->phone = $phone;
    }
}

class User
{
    private readonly string $username;
    private readonly UserProfile $profile;

    public function __construct(string $username)
    {
        $this->username = $username;
    }

    public function setProfile(UserProfile $profile)
    {
        $this->profile = $profile;
    }

    public function profile(): UserProfile
    {
        return $this->profile;
    }
}

$user = new User('gyrosbr');
$user->setProfile(new UserProfile('Daffa', '083808826134'));
var_dump($user->profile());

echo "==================";

$user->profile()->changeNumber('082124502121');
var_dump($user->profile());