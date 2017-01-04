/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package counter;

/**
 *
 * @author Flosch
 */
public class Counter {

    private int value;

    public int getValue() {
        return value;
    }

    public void click() {

        value = value + 1;
    }
    public void unclick(){
        value = value - 1;
    }
    
    public void reset(){
        value = 0;
    }

}
