Feature: add a product to my store catalog
    In order to display an item in my catalog
    As a seller
    I need to be able to add the item to my catalog

    Scenario: try adding an item to my catalog
    Given I am logged into my account
    When I click on "add to catalog"
    Then I see "Item successfully added"