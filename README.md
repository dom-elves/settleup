
# Design doc

## Database

Note: These subheadings are relevant to the **primary key** of the given table. 
### Users
#### Properties
- id
- first name
- last name
- email
- password
- other OOTB laravel breeze stuff

#### Relationships
- "users" is handled by laravel breeze out of the box.
- "users and "group"s will be a MTM relationship, with a junction table of "group users". This will cause two OTM relationships; "user"s & "groups", as well as "groups" & "users". A user can be in many groups, and a group can have many users.

### Groups
#### Proprties
- id
- name
- kitty
  
#### Relationships
- As previously mentioned, "groups" will have a MTM relationship with users, see **users** point 2 for explaination.
- "groups" will have many "debts", as a "group" will be constantly adding things such as a food bill etc. This is a OTM relationship.

### Debts
#### Properies
- id
- group id
- name (string, reference for what the debt was for e.g. "meal at restaurant"
- created by (which user added the debt)
- involved users (who was a part of the debt, stored as an array)
- total amount (initially entered by the "created by" user)
- split even (boolean value, if users agree to split a debt evenly, this will be true. Otherwise, the "created by" user will enter individual amounts.
- cleared (boolean value, allowed to be changed by the "created by" user. The idea is to have an option for them to check off a debt when it's paid).
  
#### Relationships
- A "debt" and "group" will have a OTO relationship. A "debt" will always be a single item, and is added individually per group. An example of this is that if a group buys several rounds over the course of an evening, they are likely to have different totals. Each of these gets added together, to calculate the group "kitty".

### User Debt
#### Properties
- id
- user id (OTM between "users")
- debt id (OTM between "debts")
- amount (updated by the user)
- cleared (boolean value, allows the "created by" user to update individual debts", possibly not a necessary addition)

#### Relationships
-


## Process (to be fleshed out fully)
- [x] Install laravel breeze for basic users, auth etc.
- [x] Install livewire as that will be the frontend.
- [ ] Write migrations with correct relationships.
- [ ] Build a seeder, leveraging factories.
- [ ] Write tests for operations:
    - [ ] (write a list of all the operations).
- [ ] Build the frontend (need to properly scope this out).
