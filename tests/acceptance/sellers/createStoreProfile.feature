Feature: create my store profile
    In order to build my store front
    As a seller
    I need to be able to create my store profile

    Scenario: try creating a profile
    Given I am logged in with "teststore@gmail.com" and "1234" and click "Create a Store"
    When I enter "Test Store" in "store_name" and "249 street" in "store_address" and "a test store" in "description" and click "Create!"
    Then I see "Test Store" and "Products:"