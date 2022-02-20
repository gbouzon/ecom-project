Feature: add a product to my store catalog
    In order to display a item in my catalog
    As a seller
    I need to be able to add the item in my catalog

    Scenario: try to added a item in my catalog 
    Given I am logged into my account
    When I click on "add to catalog"
    Then I see "Item added to the catalog"

    Scenario: try to added a item in my catalog
    Given I am  not logged into my account
    When I click on "add to catalog"
    Then I see "Item added to the catalog"