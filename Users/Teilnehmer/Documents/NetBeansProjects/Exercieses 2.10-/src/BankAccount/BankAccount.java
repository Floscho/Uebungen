/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BankAccount;

/**
 *
 * @author Teilnehmer
 */
public class BankAccount {

    //Variablen
    private double balance = 0;
    

    //Konstruktoren
    public BankAccount() {
        balance = 0;
    }

    public void BankAccount(double initialBalance) {
        balance = initialBalance;
    }
    
    

    //Methoden
    public void depostite(double amount) {
        balance = balance + amount;
    }

    public void withdraw(double amount) {
        balance = balance - amount;
    }

    public double getBalance() {
        return balance;
    }

}
