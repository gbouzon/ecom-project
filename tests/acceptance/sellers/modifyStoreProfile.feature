Feature: modify my store profile
    In order to properly manage my store
    As a seller
    I need to be able to modify my store profile

    Scenario: try modifying store name
    Given I am logged in with "teststore@gmail.com" and "1234" and click "Update Store Page"
    When I enter "adding some description - acceptance test" in "description" and click "Update"
    Then I see "adding some description - acceptance test" 
