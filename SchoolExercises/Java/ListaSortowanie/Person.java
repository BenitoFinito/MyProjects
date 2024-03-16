public class Person {
    String surname;
    String name;
    int age;

    public Person(String surname, String name,int age) {
        this.surname = surname;
        this.name = name;
        this.age = age;
    }

    @Override
    public String toString() {
        return surname + " " + name + " " + age;
    }
}