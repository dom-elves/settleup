
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
  
#### Relationships
- A "debt" and "group" will have a OTO relationship. A "debt" will always be a single item, and is added individually per group. An example of this is that if a group buys several rounds over the course of an evening, they are likely to have different totals. Each of these gets added together, to calculate the group "kitty".

### Payments
#### Properties
- id
- user id (OTM between "users")
- debt id (OTM between "debts")
- amount

#### Relationships
- 
