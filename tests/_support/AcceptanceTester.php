<?php


/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method void pause()
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;
    
     /**
     * @Given I enter in the search bar :term and am on page :url and choose option :option
     */
    public function iEnterInTheSearchBar($term, $url, $option) {
        $this->amOnPage($url); 
        $this->selectOption('form select[name=search_type]', $option);
        $this->seeInField('form select[name=search_type]', $option);       
        $this->fillField('search', $term);
    }

    /**
     * @Given I am on page :url
     */
    public function iAmOnPage($url) {
        $this->amOnPage($url);
    }

    /**
     * @Then I see :store and :store2
     */
    public function iSeeAnd($store, $store2) {
        $this->see($store);
        $this->see($store2);
    }
    
    /**
     * @When I click :arg1
     */
    public function iClick($arg1) {
        $this->click($arg1);
    }
    
    /**
     * @Then I see :name
     */
    public function iSee($name) {
        $this->see($name);
    }

    /**
     * @When I enter :value in :field and click :button
     */
    public function iEnterInAndClick($value, $field, $button) {
        $this->fillField($field, $value);
        $this->click($button);
    }

    /**
     * @Given I am on page :url and click :link
     */
    public function iAmOnPageAndClick($url, $link) {
        $this->amOnPage($url);
        $this->click($link);
    }


    /**
     * @Given I am logged in with :email and :password and click :link
     */
    public function iAmLoggedInWith($email, $password, $link) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->click('My Profile');
        $this->click($link);
    }
    /**
     * @Given I am logged in with :email and :password and am on page :url
     */
    public function iAmLoggedInWithAndAndAmOnPage($email, $password, $url) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->amOnPage($url);
    }

    /**
     * @When I click :link and click :button
     */
    public function iClickAndClick($link, $button) {
        $this->click($link);
        $this->click($button);
    }

    /**
     * @Given I am logged in with :email and :password and have placed an order and click :link 
     */
    public function iAmLoggedInWithAndAndClickAndHavePlaced($email, $password, $link) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->placeOrder();
        $this->click($link);
    }

    public function placeOrder() {
        $this->amOnPage("/Store/index/6");
        $this->click('Add to Cart');
        $this->click("Cart");
        $this->click("Place Order");
        $this->click('Confirm');
    }

    /**
     * @Given I am logged in with :email and :password and click :link and see a pending order
     */
    public function iAmLoggedInWithAndAndClickAndSeeAPendingOrder($email, $password, $link) {
        $this->amOnPage("/User/login");
        $this->fillField('email', 'test2@gmail.com');
        $this->fillField('password', '1234');
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->placeOrder();
        $this->click('Log out');

        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->click($link);
    }


    /**
     * @Given I am logged in with :email and :password and have added an item to cart and click :link
     */
    public function iAmLoggedInWithAndAndHaveAddedAnItemToCartAndClick($email, $password, $link) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->amOnPage("/Store/index/1");
        $this->click('Add to Cart');
        $this->click($link);
    }

    /**
     * @Given I am logged in with :email and :password
     */
    public function iAmLoggedInWithAnd($email, $password) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
    }

    /**
     * @Given I am logged in with :email and :password and click :button
     */
    public function iAmLoggedInWithAndAndClick($email, $password, $button) {
        $this->amOnPage("/User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click("Skip 2FA");
        $this->click($button);
    }

    /**
     * @When I enter :value1 in :field1 and :value2 in :field2 and :value3 in :field3 and click :button
     */
    public function iEnterInAndInAndInAndClick($value1, $field1, $value2, $field2, $value3, $field3, $button) {
        $this->fillField($field1, $value1);
        $this->fillField($field2, $value2);
        $this->fillField($field3, $value3);
        $this->click($button);
    }

    /**
     * @When I enter :value1 in :field1 and check :box and :value2 in :field2 and click :button
     */
    public function iEnterInAndCheckandInAndClick($value1, $field1, $box, $value2, $field2, $button) {
        $this->fillField($field1, $value1);
        $this->fillField($field2, $value2);
        $this->checkOption($box);
        $this->click($button);
    }

    /**
     * @When I enter :value1 in :field1 and :value2 in :field2 and :value3 in :field3 and :value4 in :field4 and :field5 and click :button
     */
    public function iEnterValuesAndClick($value1, $field1, $value2, $field2, $value3, $field3, $value4, $field4, $field5, $button) {
        $this->fillField($field1, $value1);
        $this->fillField($field2, $value2);
        $this->fillField($field3, $value3);
        $this->fillField($field4, $value4);
        $this->fillField($field5, $value4);
        $this->click($button);
    }

    /**
     * @Then I am redirected to :page
     */
    public function iAmRedirectedTo($page) {
        $this->amOnPage($page);
    }

    /**
     * @When I enter :value1 in :field1 and :value2 in :field2 and click :button
     */
    public function iEnterInAndInAndClick($value1, $field1, $value2, $field2, $button) {
        $this->fillField($field1, $value1);
        $this->fillField($field2, $value2);
        $this->click($button);
    }
    
    /**
     * @When I enter the name of the product on the search bar and press :arg1
     */
    public function iEnterTheNameOfTheProductOnTheSearchBarAndPress($arg1) {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I enter the name of the product on the search bar and press :arg1` is not defined");
    }
    
    /** 
     * @Then I see the product name and its description
     */
    public function iSeeTheProductNameAndItsDescription() {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I see the product name and its description` is not defined");
    }
    
    /**
     * @Then I see a list of stores :stores
     */
    public function iSeeAListOfStores($stores) {
        $this->see($stores);
    }            
    
    /**
     * @Given I am on a store's page :url
     */
    public function iAmOnAStoresPage($url) {
        $this->amOnPage($url);
    }                                                           
    
    /**
     * @Then I see the store's menu :menu
     */
    public function iSeeTheStoresMenu($menu) {
        $this->see($menu);
    }
}