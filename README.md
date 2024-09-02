
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
- total value

#### Summary
- "users" is handled by laravel breeze out of the box.
- "users and "groups" will be a MTM relationship, with a junction table of "group users". This will cause two OTM relationships; "users" & "groups", as well as "groups" & "users". A user can be in many groups, and a group can have many users.
- The total value is a summary of a "group users" values. As a user can be in many groups, therefore creating many group users, the "total value" will just be a sum of what a user owes/is owed overall.

### Groups
#### Proprties
- id
- name
  (this feels like there's almost too barebones, but i think it's enough for an MVP)
  
#### Summary
- As previously mentioned, "groups" will have a MTM relationship with users, see **users** point 2 for explaination.
- "groups" will have many "debts", as a "group" will be constantly adding things such as a food bill etc. This is a OTM relationship.
- Maybe in the future groups will have more customisation, like an avatar or some other settings but ofr now, just a name is enough. 

### Group Users
#### Proprties
- id
- user id (OTM between users and group users)
- group id (OTM between groups and group users)
- value

#### Summary
- Essentially as explained, a user can be in many groups and a group will have at least two users, so there is a need for a group user table.
- The value will be a total of what a group user owes/is owed across all "user debts".
  
### Debts
#### Properies
- id
- group id
- name 
- created by 
- total amount 
- split even 
- cleared 
  
#### Summary
- A "debt" and "group" will have a OTO relationship. A "debt" will always be a single item, and is added individually per group. An example of this is that if a group buys several rounds over the course of an evening, they are likely to have different totals.
- Storing a debt will create a "user debt" for each user that was involved. This will likely be a tickbox based form when the "created by" user is adding the debt in the first place.
- "total amount" is just what the overall debt is.
- "split even" will be an additional checkbox that will just split whatever the debt is between all involved users.
- "cleared" will be a box checkable by the "created by" user, allowing them to confirm everyone has paid their share. Can be used to show/hide old debts etc.

### User Debt
#### Properties
- id
- user id (OTM between "user" and "user debt")
- group user id (OTM between "group user" and "user debt")
- debt id (OTM between "debts" and "user debt")
- original amount
- paid amount
- cleared 

#### Summary
- The idea is that a "user debt" will be created for each "user" that is involved in a given "debt". Including the "user" and "debt" ids as relationships is so a "users" overall owe/oweds amounts can be totalled. Initial idea is to provide the most relevant information to the user when they log in, that being how much money they owe/are owed.
- "original amount" is set by whoever created the "debt" that has spawned the "user debt".
- "paid amount" is updated by the "user".
- "cleared" works in the same way it does for a "debt", just on an individual level. The creator of the "debt" will be able to check off individual users.

## Models
- Models to be created with relationships relative to db relationships. Also include belongsTo relationships for OTM db relationships.
- Factories to be created with the aim to create a seeder that can simulate data from ~100 users.

## Controllers
**look into best practices to do this with livewire**

## Process (to be fleshed out fully)
- [ ] Install laravel breeze for basic users, auth etc.
- [ ] Install livewire as that will be the frontend.
- [ ] Write migrations with correct relationships.
- [ ] Build a seeder, leveraging factories. This will be done in two parts.
    - [ ] User & group related. 
    - [ ] Debt related.
- [ ] Write tests for operations (detailed below)
- [ ] Build the frontend (need to properly scope this out).

### Operations (incomplete)
#### User
- sign up
- log in
- reset password (these three are possibly OOTB)

#### Group
- create group
- join group
- remove someone from group they own

#### Debt
- add a debt for all group members
- add a debt for some group members
- clear an entire debt
- clear a single user from a debt
- delete a debt
- split a debt evenly
- split a debt with custom amounts

#### Unsure where these go, might need to rethink test structure
- pay some of a debt
- pay all of a debt
  
