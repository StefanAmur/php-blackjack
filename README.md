# PHP OOP Blackjack Game

## The mission

Let's make a game in PHP: Blackjack! A game of chance and luck!

To keep the code structured for this complicated game, we are going to use classes and objects.

Your coach has provided you with some starter classes that you can use for the game, to help you out on your first OOP challenge. First spent some time reading these classes and really understand what they are doing. If something in the syntax is unclear, google it first and then ask your coach.

If this is still an unclear subject for you don't feel bad to google some basic OOP articles, or ask your coach. it is normal this feels difficult, because object oriented programming is a really complex subject!

## Assignment duration and type

We had 2️⃣ days to complete it (28/10 - 29/10) and it was a solo exercise  
Note: Any number next to ✔ or ❌ means in which day I considered the feature/todo resolved or in which day I tackeled it

## Instructions / To do

1. ✔ <b>:one:</b> Create a class called `Player` in the file `Player.php`
2. ✔ 1️⃣ Add 2 private properties:
   - ✔ 1️⃣ `cards` (array)
   - ✔ 1️⃣ `lost` (bool, default=false)
3. Add a couple of empty public methods to this class:
   - ✔ 1️⃣ `hit`
   - ✔ 1️⃣ `surrender`
   - ✔ 1️⃣ `getScore`
   - ✔ 1️⃣ `hasLost`
4. ✔ 1️⃣ Create a class called `Blackjack` in the file `Blackjack.php`
5. ✔ 1️⃣ Add 3 private properties (to the `Blackjack` class)
   - ✔ 1️⃣ `player` (Player)
   - ✔ 1️⃣ `dealer` (Player for now)
   - ✔ 1️⃣ `deck` (Deck)
