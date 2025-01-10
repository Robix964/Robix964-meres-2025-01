/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package kalapacsvetes;

import java.io.IOException;
import java.io.RandomAccessFile;
import java.nio.file.Files;
import java.nio.file.Paths;
import java.util.ArrayList;
import java.util.List;

/**
 *
 * @author kosar
 */
public class Kalapacsvetes {

    public static void main(String[] args) {

        List<Sportolo> sportolok = new ArrayList<>(); // A sportolók listája
        String fajlNev = "C:\\Users\\kosar\\OneDrive\\Asztali gép\\kalapacsvetes.txt";

        try {
            // Fájl beolvasása
            List<String> sorok = Files.readAllLines(Paths.get(fajlNev), java.nio.charset.StandardCharsets.UTF_8);

            // Az első sor a fejléc, átugorjuk
            for (int i = 1; i < sorok.size(); i++) {
                String[] adatok = sorok.get(i).split(";");

                // Sportoló objektum létrehozása
                Sportolo sportolo = new Sportolo(
                        Integer.parseInt(adatok[0]),
                        Double.parseDouble(adatok[1]),
                        adatok[2],
                        adatok[3],
                        adatok[4],
                        adatok[5]
                );

                sportolok.add(sportolo);
            }

            System.out.println("Adatok sikeresen beolvasva. Sportolók száma: " + sportolok.size());
        } catch (IOException e) {
            System.err.println("Hiba a fájl beolvasása közben: " + e.getMessage());
        }
    }
}

    
    

