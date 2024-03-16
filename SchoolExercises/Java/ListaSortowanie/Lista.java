import java.util.List;
import java.util.ArrayList;
import java.util.Comparator;
import java.util.Scanner;

public class Lista {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int close = 0;
        while (true) {
            if(close == 1) break;
            List<Person> l = new ArrayList<Person>();
            l.add(new Person("Nowak", "Jan", 10));
            l.add(new Person("Kowalski", "Adam", 15));
            l.add(new Person("Franciszek", "Adam", 15));
            l.add(new Person("Nowak", "Adam", 11));
            l.add(new Person("Nowak", "Aaron", 16));
            l.add(new Person("Kowalski", "Adam", 11));
            l.add(new Person("Kowal", "Piotr", 12));

            System.out.println("1 - Wypisz liste\n2 - Sortuj po nazwisku\n3 - Sortuj po imieniu\n4 - Sortuj po wieku\n5 - Sortuj po imieniu i wieku\n6 - Sortuj po nazwisku i wieku\n7 - Sortuj po imieniu i nazwisku");

            int obior = in.nextInt();

            switch (obior) {
                case 1 -> {

                    System.out.println("Wypisywanie za pomocą metody forEach()");
                    l.forEach(System.out::println);
                }
                case 2 -> {
                    System.out.println("\nSortuję po nazwisku");
                    l.sort(
                            new Comparator<Person>() {
                                @Override
                                public int compare(Person m1, Person m2) {

                                    String s1 = m1.surname;
                                    String s2 = m2.surname;
                                    return s1.compareTo(s2);
                                }
                            }
                    );

                    l.forEach(System.out::println);
                }
                case 3 -> {
                    System.out.println("\nSortuję po imieniu");
                    l.sort(
                            new Comparator<Person>() {
                                @Override
                                public int compare(Person m1, Person m2) {

                                    String s1 = m1.name;
                                    String s2 = m2.name;
                                    return s1.compareTo(s2);
                                }
                            }
                    );

                    l.forEach(System.out::println);
                }
                case 4 -> {
                    System.out.println("\nSortuję po wieku");
                    l.sort((Person m1, Person m2) -> {

                        if (m1.age == m2.age)
                            return 0;

                        if (m1.age > m2.age)
                            return 1;
                        else
                            return -1;
                    });

                    l.forEach(System.out::println);
                }
                case 5 -> {
                    System.out.println("\nSortuję po imieniu i wieku");

                    l.sort(
                            new Comparator<Person>() {
                                @Override
                                public int compare(Person m1, Person m2) {

                                    String s1 = m1.name;
                                    String s2 = m2.name;
                                    if (s1.compareTo(s2) == 0) {
                                        if (m1.age == m2.age)
                                            return 0;

                                        if (m1.age > m2.age)
                                            return 1;
                                        else
                                            return -1;
                                    } else {
                                        return s1.compareTo(s2);
                                    }

                                }
                            }

                    );

                    l.forEach(System.out::println);
                }
                case 6 -> {
                    System.out.println("\nSortuję po nazwisku i wieku");

                    l.sort(
                            new Comparator<Person>() {
                                @Override
                                public int compare(Person m1, Person m2) {

                                    String s1 = m1.surname;
                                    String s2 = m2.surname;
                                    if (s1.compareTo(s2) == 0) {
                                        if (m1.age == m2.age)
                                            return 0;

                                        if (m1.age > m2.age)
                                            return 1;
                                        else
                                            return -1;
                                    } else {
                                        return s1.compareTo(s2);
                                    }

                                }
                            }

                    );

                    l.forEach(System.out::println);
                }
                case 7 -> {

                    System.out.println("\nSortuję po imieniu i nazwisku");

                    l.sort(
                            new Comparator<Person>() {
                                @Override
                                public int compare(Person m1, Person m2) {

                                    String s1 = m1.name;
                                    String s2 = m2.name;
                                    if (s1.compareTo(s2) == 0) {
                                        String s3 = m1.surname;
                                        String s4 = m2.surname;
                                        return s3.compareTo(s4);

                                    } else {
                                        return s1.compareTo(s2);
                                    }

                                }
                            }

                    );

                    l.forEach(System.out::println);
                }
                default -> {
                    System.out.println("You lil' nigga");
                    close = 1;
                    break;
                }
            }

        }
    }

}
