package taschenrechner;

import java.util.ArrayList;
import java.util.Arrays;

public class EingabeAuswerter {

    public static String berechne(String termComma) throws Exception {
        String result;
        String term = termComma.replace(",", ".");
        ArrayList<ArrayList<String>> ergebnis = EingabeAuswerter.splitTerm(term);
        ArrayList<String> numbers = ergebnis.get(0);
        ArrayList<String> operations = ergebnis.get(1);
        double calc0 = Double.parseDouble(numbers.get(0));
        double calc1 = Double.parseDouble(numbers.get(1));
        String op0 = operations.get(0);
        double erg1 = 0;

        switch (op0) {
            case "+":
                erg1 = calc0 + calc1;
                break;
            case "-":
                erg1 = calc0 - calc1;
                break;
            case "*":
                erg1 = calc0 * calc1;
                break;
            case "/":
                try {
                    erg1 = calc0 / calc1;
                    if (calc0 / calc1 == Double.POSITIVE_INFINITY || calc0 / calc1 == Double.NEGATIVE_INFINITY) {
                        throw new Exception("Nicht durch 0 Teilen!");
                    }
                } catch (Exception e) {

                    throw new Exception("Nicht durch 0 Teilen!");
                }

                break;

        }
        result = String.valueOf(erg1).replace(".", ",");
        return result;
    }

    public static ArrayList<ArrayList<String>> splitTerm(String term) {

        ArrayList<String> numbers = new ArrayList<>();
        ArrayList<String> operations = new ArrayList<>();
        ArrayList<ArrayList<String>> result = new ArrayList<>();      //**ArrayList "numbers" und ArrayList"operation" 
        //werden in ArrayList result gepackt**
        String[] opSigns = {"+", "-", "*", "/"};
        int offsetIndex = 0;

        // Sucht eins der vier Zeichen 
        for (int i = 0; i < term.length(); i++) {
            if (Arrays.asList(opSigns).contains("" + term.charAt(i))) {
                numbers.add(term.substring(offsetIndex, i)); //gibt die erste zahl aus
                operations.add(term.substring(i, i + 1)); //gibt das erste Zeichen aus
                offsetIndex = i + 1;
            }
        }
        numbers.add(term.substring(offsetIndex)); //gibt die erste zahl aus

        result.add(numbers);                    //ArrayList numbers wird in die ArrayList result geschrieben und an position 0 gepackt
        result.add(operations);                 //ArrayList operations wird in die ArrayList result geschrieben und an position 1 gepackt
        return result;

    }

}
