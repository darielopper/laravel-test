<?php
@include_once __DIR__.'/../vendor/autoload.php';

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Laravel\Dusk\Browser;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends \Tests\DuskTestCase implements Context
{
    /** @var  Browser $browser */
    static $browser;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->setUp();
    }

    /**
     * @Given Que Estoy en la pagina principal
     */
    public function IamHomePage()
    {
        $this->browse(function (\Laravel\Dusk\Browser $browser) {
            //Establezo una instancia del navegador para poder cerrarlo cuando corran todas las pruebas
            self::$browser = $browser;

            $browser->visit('/')
                ->assertSee('Laravel');
        });
    }

    /**
     * @Then Debo ver el texto Laravel
     */
    public function mustSeeLaravelText()
    {
        return true;
    }

    //Se ejecuta una vez se terminen de probar los escenarios
    /** @AfterSuite */
    static function _tearDown()
    {
        self::$browser->quit();
    }
}
