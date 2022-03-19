Feature: create my store profile
    In order to build my store front
    As a seller
    I need to be able to create my store profile

    Scenario: try creating a profile
    Given I am logged into an account and have entered my profile information
    When I click on "Create profile"
    Then I see "Profile created successfully"