Feature: delete a product from my store catalog
    In order to manage my store catalog
    As a seller
    I need to be able to delete the item from my catalog

    Scenario: trying to remove a product form the catalog
    Given I am logged into my account
    When I click on "remove item from catalog"
    Then I see "Item successfully removed"