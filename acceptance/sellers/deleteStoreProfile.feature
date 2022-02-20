Feature: delete my store profile
    In order to remove delete my store profile
    As a seller
    I need to be able to delete my store profile

    Scenario: try to delete store profile
    Given I am logged into my account
    When I click "delete account"
    Then I see "Account deleted successfully"