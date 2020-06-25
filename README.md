**Robot Assignment**

Description

As a user, I want a robot to clean my 2 apartments. The first apartment has a 70 m​ 2​ hard floor.
The second apartment has a 60 m​ 2​ carpeted floor. The robot should charge its battery itself
once it runs out of energy.
I want to run a command ​ $ robot.php clean --floor=carpet --area=70​ and I want
to see the state output while it's cleaning or charging the battery. The ​ --floor​ parameter
should accept either ​ hard ​ or ​ carpet ​ to determine how the robot should behave based on the
following assumptions.

Assumptions

- The robot has a battery big enough to clean for 60 seconds in one charge.
- The robot can clean 1 m​ 2​ of hard floor in 1 second.
- The robot can clean 1 m​ 2​ of carpet in 2 seconds.
- The battery charge from 0 to 100% takes 30 seconds.

**Input**  

$ $php robot.php clean --floor=hard --area=70

arg0 = action:- action should be clean for this assignment.  
arg1 = floor:- floor can be carpet or hard.  
arg2 = area:- area can be any numeric value.  

**Sample Output**  

[action =clean] Hard foor with area 70 mt sq .  
< Robot is cleaning >...cleaned 1 mt. sq. area  battery remaining = 98.33% .  
< Robot is cleaning >...cleaned 2 mt. sq. area  battery remaining = 96.67% .  
< Robot is cleaning >...cleaned 3 mt. sq. area  battery remaining = 95% .  
.........  
Battery died :(((((  
< Robot is charging the battery > ... completed = 3.33%  
< Robot is charging the battery > ... completed = 6.67%  
< Robot is charging the battery > ... completed = 10%  
........  
Battery full :)))))  
< Robot is cleaning >... cleaned 61 mt. sq. area  battery remaining = 98.33%  
< Robot is cleaning >... cleaned 62 mt. sq. area  battery remaining = 96.67%  
< Robot is cleaning >... cleaned 63 mt. sq. area  battery remaining = 95%  
.........  
Task done!!!  
