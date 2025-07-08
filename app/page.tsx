import Image from "next/image"
import Link from "next/link"
import { Button } from "@/components/ui/button"
import { Card, CardContent } from "@/components/ui/card"
import { Badge } from "@/components/ui/badge"
import { Input } from "@/components/ui/input"
import {
  Search,
  MapPin,
  ShoppingCart,
  User,
  Star,
  Clock,
  Truck,
  Shield,
  Award,
  BuildingIcon as Barn,
  Heart,
  Plus,
  ChefHat,
} from "lucide-react"

export default function LiciousClone() {
  const categories = [
    { name: "Chicken", image: "/placeholder.svg?height=120&width=120", count: "25+ items" },
    { name: "Mutton", image: "/placeholder.svg?height=120&width=120", count: "18+ items" },
    { name: "Fish & Seafood", image: "/placeholder.svg?height=120&width=120", count: "30+ items" },
    { name: "Ready to Cook", image: "/placeholder.svg?height=120&width=120", count: "40+ items" },
    { name: "Marinades", image: "/placeholder.svg?height=120&width=120", count: "15+ items" },
    { name: "Eggs", image: "/placeholder.svg?height=120&width=120", count: "8+ items" },
  ]

  const products = [
    {
      id: 1,
      name: "Chicken Curry Cut (Small)",
      price: 299,
      originalPrice: 349,
      weight: "500g",
      rating: 4.5,
      reviews: 1250,
      image: "/chicken.png",
      badge: "Bestseller",
      deliveryTime: "90 mins",
    },
    {
      id: 2,
      name: "Mutton Curry Cut (Medium)",
      price: 649,
      originalPrice: 699,
      weight: "500g",
      rating: 4.3,
      reviews: 890,
      image: "/placeholder.svg?height=200&width=200",
      badge: "Premium",
      deliveryTime: "90 mins",
    },
    {
      id: 3,
      name: "Fresh Pomfret - Medium",
      price: 450,
      originalPrice: 500,
      weight: "500g",
      rating: 4.6,
      reviews: 567,
      image: "/placeholder.svg?height=200&width=200",
      badge: "Fresh Catch",
      deliveryTime: "90 mins",
    },
    {
      id: 4,
      name: "Chicken Seekh Kebab",
      price: 199,
      originalPrice: 229,
      weight: "200g",
      rating: 4.4,
      reviews: 2100,
      image: "/placeholder.svg?height=200&width=200",
      badge: "Ready to Cook",
      deliveryTime: "90 mins",
    },
    {
      id: 5,
      name: "Prawns - Large",
      price: 399,
      originalPrice: 449,
      weight: "250g",
      rating: 4.2,
      reviews: 445,
      image: "/placeholder.svg?height=200&width=200",
      badge: "Ocean Fresh",
      deliveryTime: "90 mins",
    },
    {
      id: 6,
      name: "Chicken Biryani Cut",
      price: 329,
      originalPrice: 379,
      weight: "750g",
      rating: 4.7,
      reviews: 1890,
      image: "/placeholder.svg?height=200&width=200",
      badge: "Chef's Special",
      deliveryTime: "90 mins",
    },
  ]

  const features = [
    {
      icon: <Shield className="w-6 h-6" />,
      title: "100% Fresh",
      description: "Freshest meat & seafood",
    },
    {
      icon: <Truck className="w-6 h-6" />,
      title: "90 Min Delivery",
      description: "Fast & reliable delivery",
    },
    {
      icon: <Award className="w-6 h-6" />,
      title: "Premium Quality",
      description: "Hand-picked by experts",
    },
    {
      icon: <ChefHat className="w-6 h-6" />,
      title: "Ready to Cook",
      description: "Pre-marinated options",
    },
  ]

  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="bg-white border-b sticky top-0 z-50">
        <div className="container mx-auto px-4">
          <div className="flex items-center justify-between h-16">
            {/* Logo */}
            <Link href="/" className="flex items-center space-x-2">
              <div className="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                <Barn className="w-5 h-5 text-white" />
              </div>
              <span className="text-2xl font-bold text-green-600">FarmFresh</span>
            </Link>

            {/* Location */}
            <div className="hidden md:flex items-center space-x-2 text-sm">
              <MapPin className="w-4 h-4 text-gray-600" />
              <span className="text-gray-600">Deliver to:</span>
              <span className="font-semibold">Mumbai 400001</span>
            </div>

            {/* Search Bar */}
            <div className="hidden lg:flex flex-1 max-w-md mx-8">
              <div className="relative w-full">
                <Search className="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" />
                <Input placeholder="Search for meat, seafood & more..." className="pl-10 pr-4 py-2 w-full" />
              </div>
            </div>

            {/* Right Menu */}
            <div className="flex items-center space-x-4">
              <Button variant="ghost" size="sm" className="hidden md:flex items-center space-x-1">
                <User className="w-4 h-4" />
                <span>Login</span>
              </Button>
              <Button variant="ghost" size="sm" className="relative">
                <ShoppingCart className="w-5 h-5" />
                <Badge className="absolute -top-2 -right-2 h-5 w-5 rounded-full p-0 flex items-center justify-center text-xs">
                  2
                </Badge>
              </Button>
            </div>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="bg-gradient-to-r from-red-50 to-orange-50 py-12">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-2 gap-8 items-center">
            <div className="space-y-6">
              <h1 className="text-4xl lg:text-6xl font-bold text-gray-900">
                Farm Fresh Meat & Seafood
                <span className="text-green-600 block">Delivered Fresh</span>
              </h1>
              <p className="text-lg text-gray-600 max-w-md">
                Premium quality meat, seafood & ready-to-cook products delivered to your doorstep in 90 minutes.
              </p>
              <div className="flex flex-wrap gap-4">
                <Button size="lg" className="bg-green-600 hover:bg-green-700">
                  Order Now
                </Button>
                <Button variant="outline" size="lg">
                  Explore Menu
                </Button>
              </div>
            </div>
            <div className="relative">
              <Image
                src="/placeholder.svg?height=400&width=500"
                alt="Fresh meat and seafood"
                width={500}
                height={400}
                className="rounded-lg shadow-lg"
              />
            </div>
          </div>
        </div>
      </section>

      {/* Features */}
      <section className="py-8 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-2 lg:grid-cols-4 gap-6">
            {features.map((feature, index) => (
              <div key={index} className="flex items-center space-x-3">
                <div className="text-green-600">{feature.icon}</div>
                <div>
                  <h3 className="font-semibold text-sm">{feature.title}</h3>
                  <p className="text-xs text-gray-600">{feature.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Categories */}
      <section className="py-12">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold text-center mb-8">Shop by Category</h2>
          <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
            {categories.map((category, index) => (
              <Link key={index} href="#" className="group">
                <Card className="hover:shadow-lg transition-shadow">
                  <CardContent className="p-4 text-center">
                    <div className="relative mb-4">
                      <Image
                        src={category.image || "/placeholder.svg"}
                        alt={category.name}
                        width={120}
                        height={120}
                        className="rounded-full mx-auto group-hover:scale-105 transition-transform"
                      />
                    </div>
                    <h3 className="font-semibold mb-1">{category.name}</h3>
                    <p className="text-sm text-gray-600">{category.count}</p>
                  </CardContent>
                </Card>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Featured Products */}
      <section className="py-12 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="flex justify-between items-center mb-8">
            <h2 className="text-3xl font-bold">Bestsellers</h2>
            <Button variant="outline">View All</Button>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {products.map((product) => (
              <Card key={product.id} className="group hover:shadow-lg transition-shadow">
                <CardContent className="p-0">
                  <div className="relative">
                    <Image
                      src={product.image || "/placeholder.svg"}
                      alt={product.name}
                      width={200}
                      height={200}
                      className="w-full h-48 object-cover rounded-t-lg"
                    />
                    <Badge className="absolute top-2 left-2 bg-green-600">{product.badge}</Badge>
                    <Button
                      size="sm"
                      variant="ghost"
                      className="absolute top-2 right-2 h-8 w-8 p-0 bg-white/80 hover:bg-white"
                    >
                      <Heart className="w-4 h-4" />
                    </Button>
                  </div>
                  <div className="p-4">
                    <h3 className="font-semibold mb-2 line-clamp-2">{product.name}</h3>
                    <div className="flex items-center space-x-2 mb-2">
                      <div className="flex items-center space-x-1">
                        <Star className="w-4 h-4 fill-yellow-400 text-yellow-400" />
                        <span className="text-sm font-medium">{product.rating}</span>
                      </div>
                      <span className="text-sm text-gray-600">({product.reviews})</span>
                    </div>
                    <div className="flex items-center space-x-2 mb-3">
                      <span className="text-lg font-bold">₹{product.price}</span>
                      <span className="text-sm text-gray-500 line-through">₹{product.originalPrice}</span>
                      <Badge variant="secondary" className="text-xs">
                        {product.weight}
                      </Badge>
                    </div>
                    <div className="flex items-center justify-between">
                      <div className="flex items-center space-x-1 text-sm text-gray-600">
                        <Clock className="w-4 h-4" />
                        <span>{product.deliveryTime}</span>
                      </div>
                      <Button size="sm" className="bg-green-600 hover:bg-green-700">
                        <Plus className="w-4 h-4 mr-1" />
                        Add
                      </Button>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>
      </section>

      {/* Newsletter */}
      <section className="py-12 bg-green-600">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-3xl font-bold text-white mb-4">Get Fresh Deals & Updates</h2>
          <p className="text-green-100 mb-6 max-w-md mx-auto">
            Subscribe to our newsletter and never miss out on fresh deals and new arrivals.
          </p>
          <div className="flex max-w-md mx-auto space-x-2">
            <Input placeholder="Enter your email" className="bg-white" />
            <Button className="bg-white text-green-600 hover:bg-gray-100">Subscribe</Button>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-12">
        <div className="container mx-auto px-4">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
              <div className="flex items-center space-x-2 mb-4">
                <div className="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center">
                  <Barn className="w-5 h-5 text-white" />
                </div>
                <span className="text-2xl font-bold text-green-600">FarmFresh</span>
              </div>
              <p className="text-gray-400 text-sm">
                Farm fresh meat & seafood delivered to your doorstep with love and care.
              </p>
            </div>
            <div>
              <h3 className="font-semibold mb-4">Quick Links</h3>
              <ul className="space-y-2 text-sm text-gray-400">
                <li>
                  <Link href="#" className="hover:text-white">
                    About Us
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Contact
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Careers
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Blog
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="font-semibold mb-4">Categories</h3>
              <ul className="space-y-2 text-sm text-gray-400">
                <li>
                  <Link href="#" className="hover:text-white">
                    Chicken
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Mutton
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Fish & Seafood
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Ready to Cook
                  </Link>
                </li>
              </ul>
            </div>
            <div>
              <h3 className="font-semibold mb-4">Support</h3>
              <ul className="space-y-2 text-sm text-gray-400">
                <li>
                  <Link href="#" className="hover:text-white">
                    Help Center
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Track Order
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Returns
                  </Link>
                </li>
                <li>
                  <Link href="#" className="hover:text-white">
                    Privacy Policy
                  </Link>
                </li>
              </ul>
            </div>
          </div>
          <div className="border-t border-gray-800 mt-8 pt-8 text-center text-sm text-gray-400">
            <p>&copy; 2024 FarmFresh. All rights reserved.</p>
          </div>
        </div>
      </footer>
    </div>
  )
}
