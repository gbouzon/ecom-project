Feature: modify a product
    In order to properly manage my store
    As a seller
    I need to be able to modify products

    Scenario: try modifying product information
    Given I am logged in with "candy@gmail.com" and "1234" and click "Update Product"
    When I enter "Test update" in "product_name" and click "Update!"
    Then I see "Test update"