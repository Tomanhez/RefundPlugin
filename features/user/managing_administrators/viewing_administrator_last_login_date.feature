@managing_administrators
Feature: Viewing administrator's last login date
    In order to be aware of administrators' detailed security data
    As an Administrator
    I want to be able to see last login date of all administrators

    Background:
        Given there is an administrator "donald@gov.us.com"
        And there is also an administrator "obama@gov.us.com"
        And administrator "donald@gov.us.com" has logged in "25-06-2018 16:24"
        And administrator "obama@gov.us.com" has logged in "21-06-2019 08:24"
        And I am logged in as an administrator

    @ui
    Scenario: Viewing last login date of all administrators
        When I browse administrators
        And I should see that administrator "donald@gov.us.com" has logged in "25-06-2018 16:24"
        And I should see that administrator "obama@gov.us.com" has logged in "21-06-2019 08:24"
