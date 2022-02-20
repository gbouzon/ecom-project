Feature: modify a product
    In order to edit product information
    As a seller
    I need to be able to modify the product

    Scenario: try modifying product information
    Given I am logged into my account and change the product information
    When I click on "save"
    Then I see "Product is updated"
