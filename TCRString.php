<?php

/*
 * This is a super simple string library.
 * 
 * Some of the features include 
 * - shortening a string to certaing number of words.
 * - shorting a string by character to the nearest word
 * - getting the last char
 * - getting the first char
 * - getting the first an last word
 * - setting the first and last word
 * - getting and setting word at index
 * 
 * Created 2015/04/25 
 * Author Darren Leak
 */

class TCRString
{
    /////////////////////////////////
    //shorteners
    /////////////////////////////////
    /**
     * 
     * NOTES
     * 
     * Shorten string to x amount of words
     *
     * The numWords contains word count. This will just return the same number of words
     * as what has been set for the numWords value.
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $numWords
     * @param type $addEllipsis
     * @return string
     */
    public function shortenByWord($string, $delimiter, $numWords, $addEllipsis = false) 
    {
        $explodedString = explode($delimiter, $string);
        $takeFromString = array_slice($explodedString, 0, $numWords);

        $builtString = implode($delimiter, $takeFromString);

        //add the ellipsis
        if ($addEllipsis)
        {
            $builtString .= "...";
        }

        return $builtString;
    }

    /**
     * 
     * NOTES
     * 
     * Shortend string to the last nearest word
     * 
     * This uses the number of characters rather than words. So if you need 50 characters
     * this will shorten the string(in this case a sentence) to the last word that would 
     * fit withing 50 characters
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $numChars
     * @param type $addEllipsis
     * @return string
     */
    public function shortenNearestWord($string, $delimiter, $numChars, $addEllipsis = false)
    {
        $explodedString = explode($delimiter, $string);

        $charCount = 0;

        //start the charCount of at 3 for the ellipsis characters
        if ($addEllipsis)
        {
            $charCount = 3;
        }

        $builtString = "";

        foreach ($explodedString as $key=>$value)
        {
            //The + 1 is used to count in the space that was removed in the array
            $charCount += strlen($value) + 1;

            //get the next word
            $nextWord = ($explodedString[$key + 1] != null) ? $explodedString[$key + 1] : "";

            //append the string to the built string if the charCount is less than the numChars
            if ($charCount <= $numChars)
            {
                if (empty($nextWord))
                {
                    return "No content";
                }


                $nextCharCount = $charCount + strlen($nextWord);

                //if nextCharCount is more than numChars then do not add ending space
                if ($nextCharCount <= $numChars)
                {
                    $builtString .= $value . " ";
                }
                else
                {
                    $builtString .= $value;
                }
            }
        }

        //add the ellipsis
        if ($addEllipsis)
        {
            $builtString .= "...";
        }

        return $builtString;
    }


    /////////////////////////////////
    // getters and setters
    /////////////////////////////////
    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @return type
     */
    public function getFirstWord($string, $delimiter)
    {
        $explodedString = explode($delimiter, $string);

        return $explodedString[0];
    }

    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @return type
     */
    public function getLastWord($string, $delimiter)
    {
        $explodedString = explode($delimiter, $string);
        $lastWord = $explodedString[count($explodedString) - 1];

        return $lastWord;
    }

    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $newWord
     * @return type
     */
    public function setFirstWord($string, $delimiter, $newWord)
    {
        $explodedString = explode($delimiter, $string);
        $explodedString[0] = $newWord;

        $builtString = implode($delimiter, $explodedString);

        return $builtString;
    }

    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $newWord
     * @return type
     */
    public function setLastWord($string, $delimiter, $newWord)
    {
        $explodedString = explode($delimiter, $string);
        $explodedString[count($explodedString) - 1] = $newWord;

        $builtString = implode($delimiter, $explodedString);

        return $builtString;
    }

    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $index
     * @return type
     */
    public function getWordAtIndex($string, $delimiter, $index)
    {
        $explodedString = explode($delimiter, $string);

        return $explodedString[$index];
    }

    /**
     * 
     * @param type $string
     * @param type $delimiter
     * @param type $index
     * @param type $newWord
     * @return type
     */
    public function setWordAtIndex($string, $delimiter, $index, $newWord)
    {
        $explodedString = explode($delimiter, $string);
        $explodedString[$index] = $newWord;

        $builtString = implode($delimiter, $explodedString);

        return $builtString;
    }


    /////////////////////////////////
    //String checks
    /////////////////////////////////
    /**
     * 
     * @param type $string
     * @return type
     */
    public function isFirstCharNumber($string)
    {
        return is_numeric($string[0]);
    }

    /**
     * 
     * @param type $string
     * @return type
     */
    public function isLastCharNumber($string)
    {
        $strLen = strlen($string);

        return is_numeric($string[$strLen - 1]);
    }
}

$s = new TCRString();
$val = $s->shortenByWord("This is a test string in NetBeans", " ", 3);

echo $val . "\n";

?>