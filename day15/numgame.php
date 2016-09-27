<?php
/***
* File: oop/class.guessnumber.php
* Author: design1online.com, LLC
* Created: 8.21.2014
* License: Public GNU
***/

class guessnumber extends game
{
    var $guesses;              //int - maximum guesses per game
    var $randomNumber = null;  //int - the random number they're trying to guess
    var $min = 50;             //int - the lowest value the random number can have
    var $max = 500;            //int - the highest value the random number can have

    /**
    * Purpose: default constructor
    * Preconditions: none
    * Postconditions: parent object started
    **/
    function guessnumber()
    {
        /**
        * instantiate the parent game class so this class
        * inherits all of the game class's attributes 
        * and methods
        **/
        game::start();
    }
    
    /**
    * Purpose: start a new guessing game
    * Preconditions: maximum number of guesses
    * Postconditions: game is ready to be displayed
    **/
    function newGame($max_guesses = 5, $min = null, $max = null)
    {
        //set the min and max values for the random number
        if (!$min)
            $min = $this->min;
         else
            $this->min = $min;
            
        if (!$max)
            $max = $this->max;
        else 
            $this->max = $max;
            
        //setup the game
        $this->start();
        
        //generate the random number
        $this->randomNumber = rand($min, $max);
            
        //set how many guesses they get before it's a game over
        if ($max_guesses)
            $this->setGuesses($max_guesses);
    }
    
    /**
    * Purpose: set or retrieve maximum guesses before game over
    * Preconditions: the data submitted from the form
    * Postconditions: guess is calculated
    **/
    function playGame($postdata)
    {
        //player pressed the button to start a new game
        if ($postdata['newgame'] || empty($this->guesses))
            $this->newGame();
            
        //player is trying to guess a number
        if (!$this->isOver() && $postdata['number'])
            echo $this->guess($postdata['number']);
                
        //display the game
        $this->displayGame();
    }
    
    /**
    * Purpose: set or retrieve maximum guesses they can make
    * Preconditions: amount of guesses (optional)
    * Postconditions: guesses has been updated
    **/
    function setGuesses($amount = 0)
    {        
        $this->guesses += $amount;
    }
    
    /**
    * Purpose: display the game interface
    * Preconditions: none
    * Postconditions: start a game or keep playing the current game
    **/
    function displayGame()
    {
        //while the game isn't over
        if (!$this->isOver())
        {
            echo "<div id=\"range\">I'm thinking of a number from " . number_format($this->min) . " to " . number_format($this->max) . ".</div>
                  <div id=\"select_number\">
                        Your Guess:
                        <input type=\"text\" name=\"number\" />
                        <input type=\"submit\" name=\"submit\" value=\"Guess\" />
                  </div>";
        }
        else
        {
            //they've won the game
            if ($this->won)
                echo successMsg("Congratulations you guessed my number $this->randomNumber! You've won the game.<br/>
                                Your final score was: $this->score");
            else if ($this->health < 0)
            {
                echo errorMsg("Game Over! Good try, my number was $this->randomNumber.<br/>
                                Your final score was: $this->score");
            }

            echo "<div id=\"start_game\"><input type=\"submit\" name=\"newgame\" value=\"New Game\" /></div>";
        }
    }
    
    /**
    * Purpose: guess a number in this word
    * Preconditions: a game has started
    * Postconditions: the game data is updated
    **/
    function guess($number)
    {            

        if ($this->isOver())
            return;

        if (!$number || !is_numeric($number))
            return errorMsg("Oops! Please enter a number.");
            
         if ($number < $this->min)
            return errorMsg("You must enter $this->min or higher.");
            
         if ($number > $this->max)
            return errorMsg("You must enter $this->max ot lower.");

        
        //if the word contains this number
        if ($number == $this->randomNumber) {
            $this->won = true;
        }
        else //word doesn't contain the number
        {
        
            //reduce their health
            $this->setHealth(ceil(100/$this->guesses) * -1);
            
            //calculate 1/6 the random number to get a distance factor
            $distance = floor($this->randomNumber / 8);
            

            if ($this->isOver())
                return;
            else {
                if ($number < $this->randomNumber - ($distance * 4) || $number > $this->randomNumber + ($distance * 4))
                    return errorMsg("So cold.");
                else if ($number < $this->randomNumber - ($distance * 3) || $number > $this->randomNumber + ($distance * 3))
                    return errorMsg("You're getting warmer...");
                else if ($number < $this->randomNumber - ($distance * 2) || $number > $this->randomNumber + ($distance * 2))
                    return errorMsg("Warm, Warm, Warm.");
                else if ($number < $this->randomNumber - $distance || $number > $this->randomNumber + $distance)
                    return errorMsg("You getting hot!");
                else
                    return errorMsg("You're really hot!!");
            }
        }
    }
}

