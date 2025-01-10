/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package kalapacsvetes;

/**
 *
 * @author kosar
 */
public class Sportolo {

    private int helyezes;
    private double eredmeny;
    private String nev;
    private String orszag;
    private String helyszin;
    private String datum;

    // Konstruktor
    public Sportolo(int helyezes, double eredmeny, String nev, String orszag, String helyszin, String datum) {
        this.helyezes = helyezes;
        this.eredmeny = eredmeny;
        this.nev = nev;
        this.orszag = orszag;
        this.helyszin = helyszin;
        this.datum = datum;
    }

    // Getterek
    public int getHelyezes() {
        return helyezes;
    }

    public double getEredmeny() {
        return eredmeny;
    }

    public String getNev() {
        return nev;
    }

    public String getOrszag() {
        return orszag;
    }

    public String getHelyszin() {
        return helyszin;
    }

    public String getDatum() {
        return datum;
    }
}

