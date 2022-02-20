Feature: modify a product
    In order to properly manage my store
    As a seller
    I need to be able to modify products

    Scenario: try modifying product information
    Given I am logged into my account and change the product information
    When I click on "Save"
    Then I see "Product is updated"
