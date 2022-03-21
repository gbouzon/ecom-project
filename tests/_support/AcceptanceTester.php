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
        $this->amOnPage("User/login");
        $this->fillField('email', $email);
        $this->fillField('password', $password);
        $this->click("Login!");
        $this->click('My Profile');
        $this->click($link);
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
     * @Given I am on the store's page
     */
    public function iAmOnTheStoresPage() {
        throw new \PHPUnit\Framework\IncompleteTestError("Step `I am on the store's page` is not defined");
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