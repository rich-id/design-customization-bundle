<?php

declare(strict_types=1);

namespace RichId\DesignCustomizationBundle\Tests\Resources\Entity;

use Doctrine\ORM\Mapping as ORM;
use RichCongress\TestTools\Tests\Resources\Entity\User as BaseUser;

/**
 * @ORM\Entity()
 * @ORM\Table(name="app_user")
 */
class DummyUser extends BaseUser
{
}
