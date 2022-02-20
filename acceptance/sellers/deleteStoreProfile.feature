Feature: delete my store profile
    In order to close my store's business
    As a seller
    I need to be able to delete my store profile

    Scenario: try to delete store profile
    Given I am logged into my account
    When I click "delete store"
    Then I see "Store deleted successfully"