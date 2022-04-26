Feature: add a product to my store catalog
    In order to display an item in my catalog
    As a seller
    I need to be able to add the item to my catalog

    Scenario: try adding an item to my catalog
    Given I am logged in with "candy@gmail.com" and "1234" and click "Add a product"
    When I enter "Chocolate Cupcake" in "product_name" and check "#checkboxproduct" and "3" in "product_price" and click "Add!"
    Then I see "Chocolate Cupcake" and "Price: $3"