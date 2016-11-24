package taschenrechner;

import java.util.ArrayList;
import java.util.Arrays;

public class Taschenrechner {

    public static void main(String[] args) {

        String term = "1234+4567+45678/789*23456";
        ArrayList<ArrayList<String>> ergebnis = EingabeAuswerter.splitTerm(term);


        System.out.println(ergebnis);    //Haupt ArrayList mit zwei Arraylisten(numbers)(operations) werden in der Methode splitTerm 
                                         //in die ArrayList "result" gepackt.
                                         
        
        //Die For-Schleife entnimmt die ArrayList aus position 0 
        for (ArrayList<String> aList : ergebnis) {   
            //Gibt die ArrayList an position 0 aus als Array
            System.out.println(aList);
            //Die For-Schleife entnimmt die einzelnen Zahlen/Zeichen aus ArrayList aList und packt sie in String "erge"
            for (String erge : aList) {     
                
                //Gibt die einzelnen Zahlen aus
                System.out.println(erge);
            }
        }

    }

}
