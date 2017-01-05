/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Counter;

/**
 *
 * @author Teilnehmer
 */
public class Counter {

    private int hour;
    private int minutes;
    private int value;

    public int getValue() {
        return value;
    }

    public void click() {

        value = value + 1;
    }

    public void reset() {
        value = 0;
    }

    public void unClick() {
        value = value - 1;
    }
    public void change(){
        this.hour = 10;
    }
    
}
