package taschenrechner;

import java.util.ArrayList;
import java.util.Arrays;

public class EingabeAuswerter {

    public static String calculate(String termComma) throws Exception {
        String result;
        String term = termComma.replace(",", ".");
        double interimResult = 0;
        ArrayList<ArrayList<String>> ergebnis = EingabeAuswerter.splitTerm(term);
        ArrayList<String> numbers = ergebnis.get(0);
        ArrayList<String> operations = ergebnis.get(1);

        
        //Falls - das erste Zeichen im Display ist enhält numbers[0] ein Leerstring
        //dieser wird durch "0" ersezt
        
        if(numbers.get(0).equals("")){
            numbers.set(0, "0");
        }
        
        if (numbers.size() > 1) {

            //eigentliche Berchnung
            //numbers vom Typ String in calcNumbers überführt
            ArrayList<Double> calcNumbers = new ArrayList<>();

            for (String number : numbers) {
                Double.parseDouble(number);
                calcNumbers.add(Double.parseDouble(number));
            }
            interimResult = calcNumbers.get(0);
            for (int i = 0; i < calcNumbers.size() - 1; i++) {

                switch (operations.get(i)) {
                    case "+":
                        interimResult = interimResult + calcNumbers.get(i + 1);
                        break;
                    case "-":
                        interimResult = interimResult - calcNumbers.get(i + 1);
                        break;
                    case "*":
                        interimResult = interimResult * calcNumbers.get(i + 1);
                        break;
                    case "/":
                        try {
                            interimResult = interimResult / calcNumbers.get(i + 1);
                            if (interimResult / calcNumbers.get(i + 1) == Double.POSITIVE_INFINITY
                                    || interimResult / calcNumbers.get(i + 1) == Double.NEGATIVE_INFINITY) {

                                throw new Exception("Nicht durch 0 Teilen!");
                            }
                        } catch (Exception e) {

                            throw new Exception("Nicht durch 0 Teilen!");
                        }

                        break;
                }
            }
        }
        result = String.valueOf(interimResult).replace(".", ",");
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
