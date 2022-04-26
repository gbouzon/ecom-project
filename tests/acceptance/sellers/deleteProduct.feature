Feature: delete a product from my store catalog
    In order to manage my store catalog
    As a seller
    I need to be able to delete the item from my catalog

    Scenario: trying to remove a product from the catalog
    Given I am logged in with "candy@gmail.com" and "1234" and click "My Profile"
    When I click on "Delete Product"
    Then I see "Item successfully removed"
